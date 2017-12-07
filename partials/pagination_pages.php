    <?php
    /*
    $total_pages finds out how many pages are needed and rounds it off to the nearest INT.
    */
    $total_pages = ceil($total_records / $limit);  
    /*
    $page_links contains the pagination. A several if statements check if certain conditions are true – and if true 
    data will be appended to the variable. 
    */
    $page_links = '<nav aria-label="Page navigation example"><ul class="pagination">';
    /*
    If the $_GET value is more than one a previous button will appear.
    */
    if(isset($_GET['page']) && $_GET['page'] > 1) {
        $page_links .= "<li class='page-item'><a class='page-link' href='?page=".($_GET['page'] - 1)."' aria-label='Previous'><span aria-hidden='true' class='glyphicon glyphicon-chevron-left'><span class='sr-only'>Previous</span><span class='sr-only'>Go to previous page</span></a></li>";
    }
    /*
    If a user deletes the GET-data in the URL the script will assume that the page is number one.
    Also, if the iterator is the same as the value of the GET-request it will be rendered as active in the pagination
    links. Links are rendered through a for-loop and the limit is the same as $total_pages.
    */
    if(empty($_GET['page'])) {
        for ($i=1; $i<=$total_pages; $i++) {  
             if(1 == $i) {
                $page_links .= "<li class='active'><a class='page-link' href='?page=".$i."'>$i<span class='sr-only'>Go to first page</span></a></li>"; 
             }
            else {
                $page_links .= "<li class='page-item'><a class='page-link' href='?page=".$i."'>$i<span class='sr-only'>Go to next page</span></a></li>"; 
             }
        };
        /*
        If there's more than one page in this state, a next button will appear.
        */
        if($total_pages > 1) {
            $page_links .= "<li class='page-item'><a class='page-link' href='?page=2' aria-label='Next'><span aria-hidden='true' class='glyphicon glyphicon-chevron-right'><span class='sr-only'>Next</span></a></li>";
        }
        echo $page_links . "</ul></nav>"; 
    }
    /*
    The same logic as above, but this handles if the GET is set, which it normally is by default.
    */
    if(isset($_GET['page'])) {
        for ($i=1; $i<=$total_pages; $i++) {  
            if($_GET['page'] == $i) {
                $page_links .= "<li class='active'><a class='page-link' href='?page=".$i."'>$i</a></li>"; 
             }
            else {
                $page_links .= "<li class='page-item'><a class='page-link' href='?page=".$i."'>$i</a></li>"; 
             }
        }
        if($_GET['page'] < $total_pages) {
            $page_links .= "<li><a class='page-link' href='?page=".($_GET['page'] + 1)."' aria-label='Next'><span aria-hidden='true' class='glyphicon glyphicon-chevron-right'></span><span class='sr-only'>Next</span></a></li>";

        }
        echo $page_links . "</ul></nav>";  
    }
?>