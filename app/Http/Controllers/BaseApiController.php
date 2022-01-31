<?php

namespace App\Http\Controllers;

class BaseApiController extends Controller
{

    /**
     * Update the specified resource in storage.
     *
     * 基本となるレスポンスを作成します。
     * @param  array  $result
     * @param  boolean  $success
     * @param  array  $errors
     */
    public function makeResponse($result, $success, $errors){
        return response()->json(
            [
                'result' => $result,
                'success' => $success,
                'errors' => $errors
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * Successレスポンスを作成します。
     * @param  array  $result
     */
    public function makeSuccessResponse($result, $custom = []){
        return response()->json(
            [
                'result' => $result,
                'success' => true,
                'errors' => [],

            ]+$custom,

        );
    }

    /**
     * Update the specified resource in storage.
     *
     * エラーレスポンスを作成します。
     * @param  array-string  $error
     */
    public function makeErrorResponse($error, $custom = null){
        $error_array = [];
        if(!is_array($error) && is_string($error)){
            $error_array[] = $error;
        }else{
            $error_array = $error;
        }
        return response()->json(
            [
                'result' => '',
                'success' => false,
                'errors' => $error_array
            ]
        );
    }
}
