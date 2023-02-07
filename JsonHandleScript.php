<?php
$searchFile = $_GET['search'];


class JsonOpeeration{

    public function uploadJson(array $data)
    {
        $array = $data;
        $json = json_encode(array('data'=>array($array)));
        if (file_put_contents("data.json", $json))
            echo "JSON file created successfully...";
        else
            echo "Oops! Error creating json file...";
    }
    public function addItemInJson($file,$newItem)
    {
        $contents = file_get_contents($file);
        $contentsDecoded = json_decode($contents, true);
        $contentsDecoded['data'][] = $newItem;
        $json = json_encode($contentsDecoded);
        file_put_contents('data.json', $json);

    }
    public function updateJson($file,$newItem)
    {
        // update all first name with ("lala")
        $contents = file_get_contents($file);
        $contentsDecoded = json_decode($contents, true);
        foreach ($contentsDecoded['data'] as $key=>$item){
            if($newItem['firstName']!==$item['firstName']){
                $contentsDecoded['data'][$key]['firstName'] = $newItem['firstName'];
            }
        }
        $json = json_encode($contentsDecoded);
        file_put_contents('data.json', $json);
    }
    public function SearchOnJson($file,$newItem)
    {
        $contents = file_get_contents($file);
        $contentsDecoded = json_decode($contents, true);
        foreach ($contentsDecoded['data'] as $key=>$item){
            if($newItem['firstName']==$item['firstName']){
                echo "exist first name";
            }else{
                echo "Not found first name with that name";
            }
        }
    }

}
$obj = new JsonOpeeration();
//$data = ["firstName"=>"Basel","lastName"=>"osama", "skills"=>"PHP","Age"=>45];
$updated_data = ["firstName"=>$searchFile];
//$obj->uploadJson($data);
//$obj->addItemInJson('data.json',$data);
//$obj->updateJson('data.json',$updated_data);
$obj->SearchOnJson('data.json',$updated_data);