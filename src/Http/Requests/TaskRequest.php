<?php

namespace Studio\Totem\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
        return [
            'description'                => 'required',
            'command'                    => 'required',
            'expression'                 => 'nullable|required_if:type,expression|cron_expression',
            'frequencies'                => 'required_if:type,frequency|array',
            'ping_url_before'            => 'nullable|url',
            'ping_url_after'             => 'nullable|url',
            'notification_email_address' => 'nullable|emails',
            'notification_phone_number'  => 'nullable|digits_between:11,13',
            'notification_slack_webhook' => 'nullable|url',
            'tags'                       => 'array|required'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'description.required'                            => 'Task description is required',
            'command.required'                                => 'Please select a command',
            'expression.required_if'                          => 'Cron Expression is required if task type is expression',
            'frequencies.required_if'                         => 'At least one frequency is required',
            'frequencies.array'                               => 'At least one frequency is required',
            'cron_expression'                                 => 'This is not a valid cron expression.',
            'ping_url_before'                                 => 'Ping before field must contain a valid url',
            'ping_url_after'                                  => 'Ping after field must contain a valid url',
            'notification_email_address.emails'               => 'Email address is not valid',
            'notification_phone_number.digits_between'        => 'Phone number should be between 11 and 13 digits including country code',
            'notification_slack_webhook.url'                  => 'Slack Webhook must be a valid url',
            'tags.required'                                   => 'Please select a one tag or more'
        ];
    }

    /**
     * Get data to be validated from the request.
     *
     * @return array
     */
    protected function validationData()
    {
        if ($this->input('type') == 'frequency') {
            $this->merge(['expression' => null]);
        }

        return $this->all();
    }
}
