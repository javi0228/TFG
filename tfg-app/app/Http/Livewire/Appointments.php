<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Auth;
use Livewire\Component;
use WireUi\Traits\Actions;

class Appointments extends Component
{
    use Actions;
    /**
     * Citas del usuario
     */
    public $appointments;
    /**
     * Atributo que se usará para cambiar la fecha de una cita
     */
    public $newDate;
    /**
     * Nueva cita a crear
     */
    public Appointment $newAppointment;
    /**
     * Bandera para abrir/cerrar modal de creación de cita
     */
    public bool $modalFlag = false;

    /**
     * Reglas de validación para la cita a crear
     */
    protected $rules = [
        'newAppointment.cause' => 'required|max:50',
        'newAppointment.diagnosis' => 'required|max:255',
        'newAppointment.office' => 'required|max:50',
        'newAppointment.date' => 'required|after:today',
    ];

    /**
     * Se ejecuta la primera vez que se renderiza la página
     */
    public function mount()
    {
        // Inicializar el objeto a crear
        $this->newAppointment = new Appointment();
        $this->newAppointment->date = date('Y-m-d');

        // Recoger todas las citas del paciente
        $this->appointments = Auth::user()->appointments;

    }

    /**
     * Se ejecuta siempre que cambia algo en la página
     */
    public function render()
    {
        return view('livewire.appointments');
    }

    /**
     * Abrir modal de cración de cita
     */
    public function openModal()
    {
        $this->newAppointment = new Appointment();

        $this->modalFlag = !$this->modalFlag;
    }

    // Crear la cita
    public function saveAppointment()
    {
        // Validar datos
        $this->validate();

        // Guardar la cita asignándolo al usuario
        if (Auth::user()->appointments()->create($this->newAppointment->toArray())) {
            $this->notification()->success(
                $title = __('Saved'),
                $description = __('New appointment saved successfully.')
            );
        } else {
            $this->notification()->error(
                $title = __('Error'),
                $description = __('An error occurred saving the appointment.')
            );
        }

        $this->openModal();
        $this->mount();
    }

    /**
     * Guardar nueva fecha
     */
    public function saveDate($appointment_id)
    {
        // Validación
        $this->validate([
            'newDate' => 'required|after:today',
        ]);
        // Recoger la cita mediante el id
        $appointment = Appointment::find($appointment_id);
        // Modificar la fecha
        $appointment->date = $this->newDate;

        // Cargamos los datos de nuevo
        $this->mount();

        // Guardamos la modificación y activamos la notificación
        if ($appointment->save()) {
            $this->notification()->success(
                $title = __('Saved'),
                $description = __('New appointment\'s date saved successfully.')
            );
            // Lanzo un evento livewire para cerrar el modal mediante javaScript
            $this->dispatchBrowserEvent('dateUpdated');
        } else {
            $this->notification()->error(
                $title = __('Error'),
                $description = __('An error occurred saving the appointment.')
            );
        }

        // Inicializamos de nuevo la fecha
        $this->newDate = null;
    }

    /**
     * Función que es llamada cuando algún campo de $newAppointment es modificado
     */
    public function updated($attribute, $value)
    {
        // Solo validamos el campo actualizado
        $this->validateOnly($attribute);
    }
}