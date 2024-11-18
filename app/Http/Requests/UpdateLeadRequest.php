<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLeadRequest extends FormRequest
{
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
        $leadUuid = $this->route('lead');
        $leadId = optional(\App\Models\Lead::where('uuid', $leadUuid)->first())->id;

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:leads,email,' . $leadId,
            'phone' => 'nullable|string|max:20',
        ];
    }
}
