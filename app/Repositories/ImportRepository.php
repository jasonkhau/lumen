<?php

namespace App\Repositories;

use App\Interfaces\ImportInterface;

class ImportRepository implements ImportInterface
{

    public function create($params)
    {
        app('db')->transaction(function () use ($params) {
            app('db')->table('imports')->insert([
                'pk' => $params['import_pk'],
                'id' => $params['id'],
                'user_pk' => $params['user_pk'],
                'order_pk' => $params['order_pk']
            ]);
            app('db')->table('imported_items')->insert($params['imported_items']);
        });
    }

    public function edit($params)
    {
        app('db')->transaction(function () use ($params) {
            app('db')->table('imported_items')->where('pk', $params['imported_item_pk'])->update([
                'imported_quantity' => $params['imported_quantity'],
                'comment' => $params['comment']
            ]);
            app('db')->table('imports')->where('pk', $params['import_pk'])->update([
                'created_date' => date('Y-m-d H:i:s')
            ]);
        });
    }

    public function delete($key)
    {
        app('db')->transaction(function () use ($key) {
            app('db')->table('imported_items')->where('import_pk', $key)->delete();
            app('db')->table('imports')->where('pk', $key)->delete();
        });
    }

    public function turn_off($key)
    {
        app('db')->table('imports')->where('pk', $key)->update([
            'is_opened' => False
        ]);
    }

    public function turn_on($key)
    {
        app('db')->table('imports')->where('pk', $key)->update([
            'is_opened' => True
        ]);
    }

    public function receive($params)
    {
        app('db')->transaction(function () use ($params) {
            app('db')->table('receiving_sessions')->insert([
                'pk' => $params['receiving_session_pk'],
                'kind' => 'importing'
            ]);
            foreach ($params['imported_groups'] as $imported_group) {
                app('db')->table('received_groups')->insert([
                    'received_item_pk' => $imported_group['imported_item_pk'],
                    'grouped_quantity' => $imported_group['grouped_quantity'],
                    'kind' => 'imported',
                    'receiving_session_pk' => $params['receiving_session_pk'],
                    'case_pk' => $params['case_pk']
                ]);
            }
            app('db')->table('cases')->where('pk', $params['case_pk'])->update(['shelf_pk' => Null]);
        });
    }

    public function edit_receiving($params)
    {
        app('db')->transaction(function () use ($params) {
            foreach ($params['imported_groups'] as $imported_group) {
                app('db')->table('received_groups')->where('pk', $imported_group['imported_group_pk'])->update([
                    'grouped_quantity' => $imported_group['grouped_quantity']
                ]);
            }
            app('db')->table('receiving_sessions')->where('pk', $params['importing_session_pk'])->update([
                'created_date' => date('Y-m-d H:i:s')
            ]);
        });
    }

    public function delete_receiving($key)
    {
        app('db')->transaction(function () use ($key) {
            app('db')->table('received_groups')->where('receiving_session_pk', $key)->delete();
            app('db')->table('receiving_sessions')->where('pk', $key)->delete();
        });
    }

    public function classify($params)
    {
        app('db')->transaction(function () use ($params) {
            app('db')->table('classified_items')->insert([
                'quality_state' => $params['quality_state'],
                'pk' => $params['classified_item_pk']
            ]);
            app('db')->table('classifying_sessions')->insert([
                'user_pk' => $params['user_pk'],
                'classified_item_pk' => $params['classified_item_pk']
            ]);
            app('db')->table('imported_items')->where('pk', $params['imported_item_pk'])->update([
                'classified_item_pk' => $params['classified_item_pk']
            ]);
        });
    }

    public function reclassify($params)
    {
        app('db')->transaction(function () use ($params) {
            app('db')->table('classified_items')->where('pk', $params['classified_item_pk'])->update([
                'quality_state' => $params['quality_state']
            ]);
            app('db')->table('classifying_sessions')->where('classified_item_pk', $params['classified_item_pk'])->update([
                'user_pk' => $params['user_pk'],
                'executed_date' => date('Y-m-d H:i:s')
            ]);
        });
    }

    public function delete_classification($key)
    {
        app('db')->transaction(function () use ($key) {
            app('db')->table('imported_items')->where('classified_item_pk', $key)->update([
                'classified_item_pk' => Null
            ]);
            app('db')->table('classifying_sessions')->where('classified_item_pk', $key)->delete();
            app('db')->table('classified_items')->where('pk', $key)->delete();
        });
    }

    public function sendback($params)
    {
        app('db')->transaction(function () use ($params) {
            app('db')->table('sendbacking_sessions')->insert([
                'pk' => $params['sendbacking_session_pk'],
                'user_pk' => $params['user_pk']
            ]);
            app('db')->table('classified_items')->where('pk', $params['classified_item_pk'])->update([
                'sendbacking_session_pk' => $params['sendbacking_session_pk'],
            ]);
            app('db')->table('received_groups')->whereIn('pk', $params['received_group_pks'])->update([
                'case_pk' => Null
            ]);
        });
    }
}