<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\ListItem;

use Illuminate\Http\Request;

//use Validator;

class ListItemController extends Controller
{
    // all
    public function index()
    {
        $posts = ListItem::all()->toArray();
        return array_reverse($posts);
    }

    // add
    public function add(Request $request)
    {
        $post = new ListItem([
            'title' => $request->input('title'),
            'is_done' => $request->input('is_done')
        ]);
        $post->save();

        return response()->json('The list item successfully added');
    }

    // edit
    public function edit($id)
    {
        $post = ListItem::find($id);
        return response()->json($post);
    }

    // update
    public function update($id, Request $request)
    {
        $post = ListItem::find($id);
        $post->update($request->all());

        return response()->json('The list item successfully updated');
    }

    // delete
    public function delete($id)
    {
        $post = ListItem::find($id);
        $post->delete();

        return response()->json('The list item successfully deleted');
    }
}
