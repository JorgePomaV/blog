<?php

// 1. TIPOS DE DATOS Y DECLARACIONES DE TIPOS ESTRICTAS
declare(strict_types=1);

/**
 * GUÍA DE PHP MODERNO - CONCEPTOS FUNDAMENTALES
 * Ejemplos prácticos de características modernas de PHP 8.x
 */

echo "=== GUÍA DE PHP MODERNO ===\n\n";

// 2. CLASES MODERNAS CON TYPED PROPERTIES
class Usuario
{
    // Propiedades con tipos declarados (PHP 7.4+)
    public string $nombre;
    public int $edad;
    public ?string $email = null; // Nullable type
    private array $roles = [];
    
    // Constructor con promoción de propiedades (PHP 8.0+)
    public function __construct(string $nombre, int $edad, ?string $email = null) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->email = $email;
    }
    
    // Método con tipos de retorno 
    public function agregarRol(string $rol): void
    {
        $this->roles[] = $rol;
    }
    
    public function obtenerRoles(): array
    {
        return $this->roles;
    }
    
    // Union types (PHP 8.0+)
    public function establecerEdad(int|float $edad): void
    {
        $this->edad = (int) $edad;
    }
}

// 3. ENUMS (PHP 8.1+)
enum EstadoUsuario: string
{
    case ACTIVO = 'activo';
    case INACTIVO = 'inactivo';
    case SUSPENDIDO = 'suspendido';
    
    public function esActivo(): bool
    {
        return $this === self::ACTIVO;
    }
}

// 4. READONLY CLASSES (PHP 8.2+)
readonly class Configuracion
{
    public function __construct(
        public string $appName,
        public string $version,
        public bool $debug = false
    ) {}
}

// 5. MATCH EXPRESSION (PHP 8.0+)
function obtenerMensajeEstado(EstadoUsuario $estado): string
{
    return match($estado) {
        EstadoUsuario::ACTIVO => 'Usuario está activo',
        EstadoUsuario::INACTIVO => 'Usuario inactivo',
        EstadoUsuario::SUSPENDIDO => 'Usuario suspendido',
    };
}

// 6. ARROW FUNCTIONS (PHP 7.4+)
$numeros = [1, 2, 3, 4, 5];
$duplicados = array_map(fn($n) => $n * 2, $numeros);

echo "6. Arrow Functions:\n";
echo "Números originales: " . implode(', ', $numeros) . "\n";
echo "Números duplicados: " . implode(', ', $duplicados) . "\n\n";

// 7. NULL COALESCING OPERATOR (??) y NULL COALESCING ASSIGNMENT (??=)
$datos = ['nombre' => 'Juan'];
$nombre = $datos['nombre'] ?? 'Anónimo';
$edad = $datos['edad'] ?? 25;

echo "7. Null Coalescing:\n";
echo "Nombre: {$nombre}\n";
echo "Edad: {$edad}\n\n";

// 8. SPACESHIP OPERATOR (<=>)
function compararNumeros(int $a, int $b): int
{
    return $a <=> $b;
}

echo "8. Spaceship Operator:\n";
echo "5 <=> 3: " . compararNumeros(5, 3) . "\n";
echo "3 <=> 5: " . compararNumeros(3, 5) . "\n";
echo "5 <=> 5: " . compararNumeros(5, 5) . "\n\n";

// 9. NAMED ARGUMENTS (PHP 8.0+)
function crearUsuarioComplejo(
    string $nombre,
    int $edad,
    string $email = '',
    bool $activo = true,
    array $metadatos = []
): Usuario {
    $usuario = new Usuario($nombre, $edad, $email ?: null);
    return $usuario;
}

$usuario1 = crearUsuarioComplejo(
    nombre: 'Ana',
    edad: 28,
    email: 'ana@ejemplo.com'
);

echo "9. Named Arguments:\n";
echo "Usuario creado: {$usuario1->nombre}, {$usuario1->edad} años\n\n";

// 10. ATTRIBUTES (PHP 8.0+)
#[Attribute]
class Validar
{
    public function __construct(
        public string $regla,
        public string $mensaje = ''
    ) {}
}

class UsuarioConValidacion
{
    #[Validar('required|string|min:3')]
    public string $nombre;
    
    #[Validar('required|email')]
    public string $email;
    
    public function __construct(string $nombre, string $email)
    {
        $this->nombre = $nombre;
        $this->email = $email;
    }
}

// 11. ARRAY UNPACKING CON STRINGS KEYS (PHP 8.1+)
$array1 = ['a' => 1, 'b' => 2];
$array2 = ['c' => 3, 'd' => 4];
$combinado = [...$array1, ...$array2];

echo "11. Array Unpacking:\n";
print_r($combinado);
echo "\n";

// 12. FIRST CLASS CALLABLE SYNTAX (PHP 8.1+)
$callback = strtoupper(...);
$texto = "hola mundo";
echo "12. First Class Callable:\n";
echo "Texto original: {$texto}\n";
echo "Texto en mayúsculas: " . $callback($texto) . "\n\n";

// 13. INTERSECTION TYPES (PHP 8.1+)
interface Logueable
{
    public function log(string $mensaje): void;
}

interface Cacheable
{
    public function cache(string $clave, mixed $valor): void;
}

class ServicioModerno implements Logueable, Cacheable
{
    public function log(string $mensaje): void
    {
        echo "[LOG] {$mensaje}\n";
    }
    
    public function cache(string $clave, mixed $valor): void
    {
        echo "[CACHE] {$clave} => " . json_encode($valor) . "\n";
    }
    
    public function procesar(Logueable&Cacheable $servicio): void
    {
        $servicio->log('Procesando datos...');
        $servicio->cache('resultado', ['status' => 'completado']);
    }
}

echo "13. Intersection Types:\n";
$servicio = new ServicioModerno();
$servicio->procesar($servicio);
echo "\n";

// 14. EJEMPLOS PRÁCTICOS CON LARAVEL-STYLE
class RepositorioUsuarios
{
    private array $usuarios = [];
    
    public function crear(array $datos): Usuario
    {
        $usuario = new Usuario(
            $datos['nombre'],
            $datos['edad'],
            $datos['email'] ?? null
        );
        
        $this->usuarios[] = $usuario;
        return $usuario;
    }
    
    public function buscarPorNombre(string $nombre): ?Usuario
    {
        foreach ($this->usuarios as $usuario) {
            if ($usuario->nombre === $nombre) {
                return $usuario;
            }
        }
        return null;
    }
    
    public function filtrarPorEdad(int $edadMinima): array
    {
        return array_filter(
            $this->usuarios,
            fn(Usuario $usuario) => $usuario->edad >= $edadMinima
        );
    }
}

echo "14. Ejemplo Práctico - Repositorio:\n";
$repo = new RepositorioUsuarios();
$repo->crear(['nombre' => 'Carlos', 'edad' => 25, 'email' => 'carlos@test.com']);
$repo->crear(['nombre' => 'María', 'edad' => 30, 'email' => 'maria@test.com']);
$repo->crear(['nombre' => 'Pedro', 'edad' => 20]);

$usuarioEncontrado = $repo->buscarPorNombre('Carlos');
if ($usuarioEncontrado) {
    echo "Usuario encontrado: {$usuarioEncontrado->nombre}\n";
}

$usuariosAdultos = $repo->filtrarPorEdad(25);
echo "Usuarios de 25+ años: " . count($usuariosAdultos) . "\n\n";

echo "=== FIN DE LA GUÍA ===\n";
echo "¡Ejecuta este archivo para ver todos los ejemplos en acción!\n";
