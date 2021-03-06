<?php

namespace App\Validators;

use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Routing\ProvidesConvenienceMethods;

class DemandValidator
{
    use ProvidesConvenienceMethods;

    public function create($params)
    {
        try {
            $this->validate($params, [
                'workplace_pk' => 'required|uuid|exists:workplaces,pk',
                'conception_pk' => 'required|uuid|exists:conceptions,pk,is_active,' . True,
                'product_quantity' => 'nullable|integer|between:1,32000',
                'demanded_items.*.accessory_pk' => 'required|uuid|exists:accessories,pk,is_active,' . True,
                'demanded_items.*.demanded_quantity' => 'required|integer|between:1,99999999',
                'demanded_items.*.comment' => 'nullable|string|max:20',
                'user_pk' => 'required|uuid|exists:users,pk,is_active,' . True
            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return False;
    }

    public function edit($params)
    {
        try {
            $this->validate($params, [
                'demand_pk' => 'required|uuid|exists:demands,pk',
                'demanded_item_pk' => 'required|uuid|exists:demanded_items,pk,demand_pk,' . $params['demand_pk'],
                'demanded_quantity' => 'required|integer|between:1,99999999',
                'comment' => 'nullable|string|max:20',
                'user_pk' => 'required|uuid|exists:users,pk,is_active,' . True
            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return False;
    }

    public function delete($params)
    {
        try {
            $this->validate($params, [
                'demand_pk' => 'required|uuid|exists:demands,pk',
                'user_pk' => 'required|uuid|exists:users,pk,is_active,' . True
            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return False;
    }

    public function turn_off($params)
    {
        try {
            $this->validate($params, [
                'demand_pk' => 'required|uuid|exists:demands,pk',
                'user_pk' => 'required|uuid|exists:users,pk,is_active,' . True
            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return False;
    }

    public function turn_on($params)
    {
        try {
            $this->validate($params, [
                'demand_pk' => 'required|uuid|exists:demands,pk',
                'user_pk' => 'required|uuid|exists:users,pk,is_active,' . True
            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return False;
    }

    public function issue($params)
    {
        try {
            $this->validate($params, [
                'demand_pk' => 'required|uuid|exists:demands,pk,is_opened,' . True,
                'issued_groups.*.case_pk' => 'required|uuid|exists:cases,pk|empty_case',
                'issued_groups.*.received_item_pk' => 'required|uuid|exists:entries,received_item_pk',
                'issued_groups.*.grouped_quantity' => 'required|integer|between:1,99999999',
                'inCased_items.*.case_pk' => 'required|uuid|exists:cases,pk|stored_case',
                'inCased_items.*.received_item_pk' => 'required|uuid|exists:entries,received_item_pk',
                'inCased_items.*.issued_quantity' => 'required|integer|between:1,99999999',
                'user_pk' => 'required|uuid|exists:users,pk,is_active,' . True
            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return False;
    }

    public function confirm_issuing($params)
    {
        try {
            $this->validate($params, [
                'consuming_session_pk' => 'required|uuid|exists:issuing_sessions,pk,kind,consuming',
                'enabled_cases.*.case_pk' => 'required|uuid|exists:issued_groups,case_pk,issuing_session_pk,' . $params['consuming_session_pk'],
                'user_pk' => 'required|uuid|exists:users,pk,is_active,' . True
            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return False;
    }

    public function return_issuing($params)
    {
        try {
            $this->validate($params, [
                'consuming_session_pk' => 'required|uuid|exists:issuing_sessions,pk,kind,consuming',
                'pair.*.case_pk' => 'required|uuid|exists:issued_groups,case_pk,issuing_session_pk,' . $params['consuming_session_pk'],
                'pair.*.shelf_pk' => 'required|uuid|exists:shelves,pk',
                'user_pk' => 'required|uuid|exists:users,pk,is_active,' . True
            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return False;
    }
}
