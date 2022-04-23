<?php

//返回JSON
if($_POST){
    echo json_encode(upload($_FILES));
}

//上传文件函数
function upload($file)
{


    $path = '../images/'.date('Ymd',time());
    if(!is_dir($path))
    {
        mkdir($path,0777,true);
    }

    $url = date('Ymd',time()).'_'.rand(1111,9999).'.png';
    $fileName = urldecode($file['upload']['name']);
    $tmpName = $file['upload']['tmp_name'];
    $path_parts = pathinfo($fileName);
    $ext = $path_parts['extension'];
    $ext = strtolower($ext);

    if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif' || $ext == 'bmp') {

        //保存路径
        $savePath = $path . '/' . $url;
        //另存为新文件名称
        if (!move_uploaded_file($tmpName,$savePath))
        {
            exit;
        }
        //构建返回数组
        return [
            'uploaded' => true,
            'fileName' => $url,
            'url'      => $savePath
        ];
    }
}

