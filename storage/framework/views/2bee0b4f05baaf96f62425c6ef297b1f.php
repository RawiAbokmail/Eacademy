<?php $__env->startSection('title', 'Blogs'); ?>
<?php $__env->startSection( 'content'); ?>


<?php $__env->startSection('css'); ?>
<style>
    .singel-blog .blog-thum img {
    width: 100%;
    max-height: 300px;
}
</style>
<?php $__env->stopSection(); ?>

    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url(<?php echo e(asset('backend/images/page-banner-4.jpg)')); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Blog</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== BLOG PART START ======-->

    <section id="blog-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
           <div class="row">
               <div class="col-lg-8">
                   <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="singel-blog mt-30">
                       <div class="blog-thum">
                           <img src="<?php echo e(asset('uploads/'. $blog->image)); ?>" alt="Blog">
                       </div>
                       <div class="blog-cont">
                           <a href="<?php echo e(route('eacademy.blog-single', $blog)); ?>"><h3><?php echo e($blog->title); ?></h3></a>
                           <ul>
                               <li><a href="#"><i class="fa fa-calendar"></i><?php echo e($blog->created_at); ?></a></li>
                               <li><a href="#"><i class="fa fa-user"></i>Mark anthem</a></li>
                               <li><a href="#"><i class="fa fa-tags"></i><?php $__currentLoopData = $blog->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="badge"><?php echo e($tag->name); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></a></li>
                           </ul>
                           <p><?php echo e($blog->content); ?></p>
                       </div>
                   </div> <!-- singel blog -->
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($blogs->appends($_GET)->links()); ?>


                   
               </div>
               <div class="col-lg-4">
                   <div class="saidbar">
                       <div class="row">
                           <div class="col-lg-12 col-md-6">
                               <div class="saidbar-search mt-30">
                                   <form action="<?php echo e(route('eacademy.blogs')); ?>" method="GET">
                                       <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Search">
                                       <button type="submit"><i class="fa fa-search"></i></button>
                                   </form>
                               </div> <!-- saidbar search -->
                               <div class="categories mt-30">
                                   <h4>Categories</h4>
                                   <ul>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(route('eacademy.blogs', ['category' =>          $category->slug])); ?>" class="d-block mb-2">
                                            <?php echo e($category->name); ?>

                                        </a>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   </ul>
                               </div>
                           </div> <!-- categories -->
                       </div> <!-- row -->
                   </div> <!-- saidbar -->
               </div>
           </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== BLOG PART ENDS ======-->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\Eacademy\resources\views/eacademy/blogs.blade.php ENDPATH**/ ?>