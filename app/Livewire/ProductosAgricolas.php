<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ProductoAgricola;

class ProductosAgricolas extends Component
{
    public $producto_id = null;
public $isEdit = false;

    public $nombre;
    public $variedad;
    public $origen;
    public $fecha_cosecha;
    public $peso;
    public $precio_kilo;
    public $calidad = 'primera';

    public function guardar()
{
    $this->validate([
        'nombre' => 'required|max:100',
        'variedad' => 'nullable|max:80',
        'origen' => 'required|max:100',
        'fecha_cosecha' => 'required|date',
        'peso' => 'required|numeric|min:0.01',
        'precio_kilo' => 'required|numeric|min:0.01',
        'calidad' => 'required|in:primera,segunda,tercera',
    ]);

    if ($this->producto_id) {
        // Actualizar producto existente
        $producto = ProductoAgricola::find($this->producto_id);
        $producto->update([
            'nombre' => $this->nombre,
            'variedad' => $this->variedad,
            'origen' => $this->origen,
            'fecha_cosecha' => $this->fecha_cosecha,
            'peso' => $this->peso,
            'precio_kilo' => $this->precio_kilo,
            'calidad' => $this->calidad,
        ]);
    } else {
        // Crear nuevo producto
        ProductoAgricola::create([
            'nombre' => $this->nombre,
            'variedad' => $this->variedad,
            'origen' => $this->origen,
            'fecha_cosecha' => $this->fecha_cosecha,
            'peso' => $this->peso,
            'precio_kilo' => $this->precio_kilo,
            'calidad' => $this->calidad,
        ]);
    }

    // Limpiar formulario
    $this->reset();

    // Si usas paginación o listado, actualiza la vista// para limpiar propiedades


    // Opcional: mensaje de sesión o notificación
    session()->flash('message', $this->producto_id ? 'Producto actualizado.' : 'Producto creado.');

    // Limpiar bandera edición
    $this->producto_id = null;
    $this->isEdit = false;
}


public function editar($id)
{
    $producto = ProductoAgricola::findOrFail($id);
    
    $this->producto_id = $producto->id;
    $this->nombre = $producto->nombre;
    $this->variedad = $producto->variedad;
    $this->origen = $producto->origen;
    $this->fecha_cosecha = $producto->fecha_cosecha;
    $this->peso = $producto->peso;
    $this->precio_kilo = $producto->precio_kilo;
    $this->calidad = $producto->calidad;

    $this->isEdit = true;
}



    public function eliminar($id)
    {
        $producto = ProductoAgricola::find($id);

        if ($producto) {
            $producto->delete();
        }

        $this->reset();
    }

    public function render()
    {
        return view('livewire.productos-agricolas', [
            'productos' => ProductoAgricola::all(),
        ]);
    }
}
