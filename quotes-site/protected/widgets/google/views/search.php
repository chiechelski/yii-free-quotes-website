<?php  

    if (!is_null($this->links))
    {
        echo '<div class="search-results">';
        foreach ($this->links as $link)
        {
            echo '<div class="title"><a href="' . $link['url'] . '">' . $link['title'] . '</a></div>';
            echo '<div class="content">' . $link['content'] . '</div>';
        }
        echo '</div>';
    }
    else
    {
        
    }
?>


