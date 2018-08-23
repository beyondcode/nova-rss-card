<?php
namespace Beyondcode\RssCard\Http\Controllers;


use Illuminate\Http\Request;

class RssFeedController
{

    public function items(Request $request)
    {
        $feed = new \SimplePie();
        $feed->set_cache_location(storage_path('framework/cache'));
        $feed->set_feed_url($request->get('url'));

        $feed->init();

        $items = [];

        foreach ($feed->get_items(0, $request->get('limit', 5)) as $item) {
            $items[] = [
                'title' => $item->get_title(),
                'link' => $item->get_link(),
                'description' => $item->get_description(),
                'date' => $item->get_date('Y-m-d H:m:i')
            ];
        }

        return [
            'title' => $feed->get_title(),
            'items' => $items
        ];
    }

}