<?php

    class GalleryPhotos{
        public $id_gallery_photos;
        public $galleries_id_gallery;
        public $image;
        public $description;
        public $date_created;
        
        
        public function is_valid()
        {
            if(is_numeric($this->galleries_id_gallery) and
               strlen(trim($this->image)) > 0          and
               strlen(trim($this->date_created)) > 0
              )
            {
                return true;
            }
            return false;
        }
    }
?>
