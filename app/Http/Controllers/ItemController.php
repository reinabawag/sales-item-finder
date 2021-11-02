<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SytelineItem;
use App\Item;

class ItemController extends Controller
{
    public function index()
    {
        return view('items.index2');
    }

    public function importFromSyteline()
    {
        $items = SytelineItem::select('item', 'description')->where('reservable', 1)->get();

        foreach ($items as $item) {
            Item::firstOrCreate(['item' => $item->item, 'description' => $item->description]);
        }

        return ['status' => TRUE];
    }
}
