<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\MedicalHistory as MedicalHistoryModel;
use Livewire\Component;
// Importación de notificaciones de wireui
use WireUi\Traits\Actions;

class MedicalHistory extends Component
{
    use Actions;
    /**
     *  Variable a mostrar en caso de que el usuario tenga historial médico
     * @var mixed
     */
    public $medicalHistory;
    /**
     * Variable para crear el historial médico en caso de que el usaurio no tenga
     * @var MedicalHistoryModel
     */
    public MedicalHistoryModel $newMedicalHistory;
    /**
     * Bandera para abrir el modal de creación
     * @var boolean
     */
    public $cardModal = false;
    /**
     * Reglas de validación de los campos del objeto a crear
     * @var array
     */
    protected $rules = [
        'newMedicalHistory.other_diseases' => 'required|max:255',
        'newMedicalHistory.allergies' => 'required|max:255',
        'newMedicalHistory.emergency_phone' => 'required|max:9|min:9',
        'newMedicalHistory.diabetes' => 'sometimes',
        'newMedicalHistory.cancer' => 'sometimes',
        'newMedicalHistory.epilepsy' => 'sometimes',
        'newMedicalHistory.overweight' => 'sometimes',
    ];

    /**
     * Este función se ejecuta la primera vez que el componente es renderizado
     * La usamos para inicializar atributos, es una especie de constructor
     */
    public function mount()
    {
        // Recogemos el historial médico del paciente logueado
        $this->medicalHistory = Auth::user()->medicalHistory;
        // Si no tiene, creamos una nueva instancia del objeto para ahora ir rellenando los datos mediante LiveWire
        // Por eso hemos creado otro atributo diferente con el tipo de dato fijado
        $this->newMedicalHistory = new MedicalHistoryModel();
    }

    /**
     * Renderizar componente
     * Se ejecuta cada vez que se realiza un cambio en algún atributo de la clase
     */
    public function render()
    {
        return view('livewire.medical-history');
    }


    /**
     * Abrir modal
     */
    public function toogleModal()
    {
        $this->cardModal = !$this->cardModal;
    }

    /**
     * Esta función se ejecuta cada vez que una propiedad definida en 'rules' es actualizada
     */
    public function updated($propertyName)
    {
        // Sólo validamos la propiedad que hemos actualizado
        $this->validateOnly($propertyName);
    }

    /**
     * Función que se ejecutará al clicar en guardar
     */
    public function save()
    {
        // Llamamos a la función de validación
        $this->validate();

        // Si no hay ningún error de validación, el  flujo seguirá su curso
        // y guardaremos el modelo en base de datos asociándolo diréctamente con el usuario
        // Notificamos al usuario del resultado de la operación
        if (Auth::user()->medicalHistory()->create($this->newMedicalHistory->toArray())) {
            $this->notification()->success(
                $title = __('Saved'),
                $description = __('Medical History saved successfully.')
            );
        } else {
            $this->notification()->error(
                $title = __('Error'),
                $description = __('An error occurred saving the medical history.')
            );
        }

        // Volvemos a llamar a la función mount para volver a leer el historial médico
        $this->mount();

        // Cerraremos el modal
        $this->toogleModal();
    }
}