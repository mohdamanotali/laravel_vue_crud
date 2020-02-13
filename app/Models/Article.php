<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // protected $table = 'articles';
    protected $guarded = [];

    // Get list of articles
    public static function getArticles()
    {
        // $url = "https://n161.tech/api/dummyapi/post?page=1&limit=100";
        // $curl = curl_init();
        // curl_setopt($curl, CURLOPT_URL, $url);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // $response = curl_exec($curl);
        // $array_data = json_decode($response, true);
        // curl_close($curl);
        // return $array_data;
        return Article::orderBy('updated_at', 'desc')->paginate(5);
    }

    // Add article
    public static function addArticle($data)
    {
        return Article::create([
            'title' => $data['title'],
            'description' => $data['description']
        ]);
    }

    // Edit article
    public static function editArticle($data)
    {
        return Article::where('id', $data['id'])->update([
            'title' => $data['title'],
            'description' => $data['description']
        ]);
    }

    // Delete article
    public static function deleteArticle($id)
    {
        return Article::where('id', $id)->delete();
    }
}
