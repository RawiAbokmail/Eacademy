<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('dashboard.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        // validation done

        $data = $request->except(['_token']);

        $originalSlug = Str::slug($request->title);
        $slug = $originalSlug;
        $count = 1;

        while (Event::where('slug', $slug)->exists()) {
        $slug = $originalSlug . '-' . $count;
        $count++;
    }

        $data['slug'] = $slug;

       if ($request->hasFile('image')) {
        $path = $request->file('image')->store('uploads', 'custom');
        $data['image'] = $path;
    }

        Event::create($data);

        return redirect()
        ->route('dashboard.events.index')
        ->with('success', 'Event Added successfully')
        ->with('type', 'success');

    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('dashboard.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('dashboard.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, Event $event)
    {
        // make validation

        $data = $request->except(['_token']);

        if($request->title !== $event->title ){
            $originalSlug = Str::slug($request->title);
            $slug = $originalSlug;
            $count = 1;

            while (Event::where('slug', $slug)->where('id', '!=', $event->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $data['slug'] = $slug;
        } else {
            $data['slug'] = $event->slug; // الاحتفاظ بالـ slug القديم اذا لم يتغير العنوان
        }

        if ($request->hasFile('image')) {
             // Delete the old image if exists
            if ($event->image && file_exists(public_path($event->image))) {
                unlink(public_path($event->image));
            }
            $path = $request->file('image')->store('uploads', 'custom');
            $data['image'] = $path;
        }

        $event->update($data);

        return redirect()
            ->route('dashboard.events.index')
            ->with('success', 'Event Updated successfully')
            ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
         if ($event->image && file_exists(public_path($event->image))) {
            unlink(public_path($event->image));
        }

        $event->delete();

        return redirect()
            ->route('dashboard.events.index')
            ->with('success', 'Event Deleted successfully')
            ->with('type', 'danger');
    }
}