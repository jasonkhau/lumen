<?php

namespace App\Http\Controllers;

use App\ViewModels\Accessory;
use App\ViewModels\Conception;
use App\ViewModels\Partner;
use App\ViewModels\ReceivedGroup;
use App\ViewModels\ReceivedItem;
use App\ViewModels\Receiving;
use App\ViewModels\Report;
use App\ViewModels\RootIssuedItem;
use App\ViewModels\RootIssuing;
use App\ViewModels\RootReceivedItem;
use App\ViewModels\RootReceiving;
use App\ViewModels\Shared;
use Illuminate\Http\Request;

class AngularController extends Controller
{
    private $receiving;
    private $accessory;
    private $received_item;
    private $received_group;
    private $root_received_item;
    private $root_receiving;
    private $partner;
    private $root_issued_item;
    private $conception;
    private $root_issuing;
    private $shared;
    private $report;

    public function __construct(Report $report, Shared $shared, RootIssuing $root_issuing, RootIssuedItem $root_issued_item, Partner $partner, Receiving $receiving, Accessory $accessory, ReceivedItem $received_item, ReceivedGroup $received_group, RootReceivedItem $root_received_item, RootReceiving $root_receiving, Conception $conception)
    {
        $this->receiving = $receiving;
        $this->accessory = $accessory;
        $this->received_item = $received_item;
        $this->received_group = $received_group;
        $this->root_received_item = $root_received_item;
        $this->root_receiving = $root_receiving;
        $this->conception = $conception;
        $this->partner = $partner;
        $this->root_issued_item = $root_issued_item;
        $this->root_issuing = $root_issuing;
        $this->shared = $shared;
        $this->report = $report;
    }

    public function get_partner(Request $request)
    {
        $response = $this->partner->get($request);
        $response = array_values($response);
        return response()->json(['partners' => $response], 201);
    }

    public function get_receiving(Request $request)
    {
        $response = $this->receiving->get($request);
        $response = array_values($response);
        return response()->json(['receivings' => $response], 201);
    }

    public function get_accessory(Request $request)
    {
        $response = $this->accessory->get($request);
        $response = array_values($response);
        return response()->json(['accessories' => $response], 201);
    }

    public function get_received_item(Request $request)
    {
        $response = $this->received_item->get($request);
        $response = array_values($response);
        return response()->json(['received-items' => $response], 201);
    }

    public function get_received_group(Request $request)
    {
        $response = $this->received_group->get($request);
        $response = array_values($response);
        return response()->json(['received_groups' => $response], 201);
    }

    public function get_root_received_item(Request $request)
    {
        $response = $this->root_received_item->get($request);
        $response = array_values($response);
        return response()->json(['root-received-items' => $response], 201);
    }

    public function get_root_receiving(Request $request)
    {
        $response = $this->root_receiving->get($request);
        $response = array_values($response);
        return response()->json(['root-receivings' => $response], 201);
    }

    public function get_conception(Request $request)
    {
        $response = $this->conception->get($request);
        $response = array_values($response);
        return response()->json(['conceptions' => $response], 201);
    }

    public function get_root_issued_item(Request $request)
    {
        $response = $this->root_issued_item->get($request);
        $response = array_values($response);
        return response()->json(['root-received_items' => $response], 201);
    }

    public function get_root_issuing(Request $request)
    {
        $response = $this->root_issuing->get($request);
        $response = array_values($response);
        return response()->json(['root_issuings' => $response], 201);
    }

    public function get_activity_log()
    {
        $response = $this->shared->get_activity_log();
        $response = array_values($response);
        return response()->json(['activity-logs' => $response], 201);
    }

    public function get_inventory()
    {
        $response = $this->shared->get_inventory();
        $response = array_values($response);
        return response()->json(['inventories' => $response], 201);
    }

    public function get_report(Request $request)
    {
        $response = $this->report->get($request);
        $response = array_values($response);
        return response()->json(['reports' => $response], 201);
    }

    public function get_block()
    {
        $response = $this->shared->get_block();
        $response = array_values($response);
        return response()->json(['blocks' => $response], 201);
    }

    public function get_history()
    {
        $response = $this->shared->get_history();
        $response = array_values($response);
        return response()->json(['histories' => $response], 201);
    }

    public function get_cased_received_group()
    {
        $response = $this->shared->get_cased_received_group();
        $response = array_values($response);
        return response()->json(['cased-received-groups' => $response], 201);
    }

    public function get_failed_item()
    {
        $response = $this->shared->get_failed_item();
        $response = array_values($response);
        return response()->json(['failed-items' => $response], 201);
    }

    public function get_type()
    {
        $response = $this->shared->get_type();
        $response = array_values($response);
        return response()->json(['types' => $response], 201);
    }

    public function get_unit()
    {
        $response = $this->shared->get_unit();
        $response = array_values($response);
        return response()->json(['units' => $response], 201);
    }

    public function get_mediator()
    {
        $response = $this->shared->get_mediator();
        $response = array_values($response);
        return response()->json(['mediators' => $response], 201);
    }

}

