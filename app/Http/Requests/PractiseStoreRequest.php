<?php

namespace App\Http\Requests;

use App\Classes\EndDate;
use Illuminate\Foundation\Http\FormRequest;

class PractiseStoreRequest extends FormRequest
{
    public $end_date;

    public function __construct(EndDate $getDate)
    {
        $this->end_date = $end_date;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'start_date' => ['required'],
            'title' => ['required', 'numeric'],
            'user_id' => ['required', 'numeric'],
            'number_of_days' => ['required', 'numeric'],
        ];
    }

    /**
     * Handle the process of storing practise
     * 
     * @return 
     */
    public function handle()
    {
        $user = \App\User::with(['profile'])->where('id', $this->user_id)->firstOrFail();

        return \App\Practise::create([
            'user_id' => $user->id,
            'title' => $this->title,
            'start_date' => $this->start_date,
            'number_of_days' => $this->number_of_days,
            'end_date' => $this->end_date->handle($this->start_date, $this->number_of_days, $user),
        ]);
    }

}
