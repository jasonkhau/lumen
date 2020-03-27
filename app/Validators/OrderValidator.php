<?php

namespace App\Validators;

use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Routing\ProvidesConvenienceMethods;

class OrderValidator
{
    use ProvidesConvenienceMethods;

    public function create($params)
    {
        try {
            $this->validate($params, [
                'supplier_pk' => 'required|uuid|exists:suppliers,pk,is_active,' . True,
                'order_id' => 'required|string|max:25|unique:orders,id',
                'ordered_items.*.accessory_pk' => 'required|uuid|exists:accessories,pk,is_active,' . True,
                'ordered_items.*.ordered_quantity' => 'required|integer|between:1,2000000000',
                'ordered_items.*.comment' => 'nullable|string|max:20',
                'user_pk' => 'required|uuid|exists:users,pk',
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
                'order_pk' => 'required|uuid|exits:orders,pk',
                'ordered_item_pk' => 'required|uuid|exists:ordered_items,pk',
                'ordered_quantity' => 'required|integer|between:1,2000000000',
                'comment' => 'nullable|string|max:20',
                'user_pk' => 'required|uuid|exists:users,pk',
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
            $this->validate($params,[
                'order_pk' => 'required|uuid|exits:orders,pk',
                'user_pk' => 'required|uuid|exits:users,pk'
            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        } return False;
    }

    public function turn_off($params)
    {
        try {
            $this->validate($params,[
                'required|uuid|exits:orders,pk,is_opened,' . True,
                'user_pk' => 'required|uuid|exits:users,pk'
            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        } return False;
    }

    public function turn_on($params)
    {
        try {
            $this->validate($params,[
                'required|uuid|exits:orders,pk,is_opened,' . False,
                'user_pk' => 'required|uuid|exits:users,pk'
            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        } return False;
    }

}