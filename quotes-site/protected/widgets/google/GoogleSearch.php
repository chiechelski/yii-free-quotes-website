<?php
/**
 * class Facebook
 * @author Igor Ivanović 
 */
class GoogleSearch extends CWidget
{
    public $links = null;
    
    /**
    * Run Widget
    */
    public function run()
    {
        $this->renderJavascript();
        $this->render('search');
    }
    
    /**
    * Render necessary facebook  javascript
    */
    private function renderJavascript()
    {
        $query = substr($_SERVER["REQUEST_URI"],1);
        $url = "http://ajax.googleapis.com/ajax/services/search/web?v=2.0&key=AIzaSyD_52-mFvwBSim0EYlk1GOfdhTZzQt7Krk&filter=0&start=0&q=".$query;

        $body = file_get_contents($url);
        $json = json_decode($body);

        $count = 0;
        
        $links = array();        
        foreach ($json->responseData->results as $result)
        {            
            $links[] = array('title' => $result->titleNoFormatting, 
                             'content' => $result->content, 
                             'url' => Link::transformUrl($result->url));            
            
            if ($count++ > 5)
                break;
        }    
        $this->links = $links;
    }
    
}
