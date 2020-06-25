<?php


namespace App\Services;


interface PDFServiceInterface
{
    /**
     * @param $id
     * @param $url
     * @return \Illuminate\Http\Response
     */
    public function makePDF($id, $url);
}
