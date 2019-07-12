   <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->

                            <?php
                            $all_publish_Category =DB::table('tbl_category')
                            ->where('publication_status', 1)
                            ->get();

                            foreach ($all_publish_Category as  $v_category) {
                                # code...
                           
                            ?>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a  href="{{URL::to('/product_by_category/'.$v_category->id)}}">
                                          {{$v_category->category_name}}
                                            
                                        </a>
                                    </h4>
                                </div>
                            
                            </div>
                            <?php
 }
                            ?>
                           
                            
                            
                        </div><!--/category-products-->