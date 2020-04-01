<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                <h1 class="text-center">Your Reviews results</h1>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
              
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($post->user_id == $id ): ?> 
                    <div class="panel panel-default text-center">
                        <div class="panel-heading" style="font-size: 28px;">
                            Title :<?php echo e($post->title); ?><br>
                            Content: <?php echo e($post->content); ?>

                        </div>
                        <?php if($post->Review=="Positive\n"): ?>
                        <div class="panel-body" style=" background-color: lightgreen;">
                            Content Review:<br> <?php echo e($post->Review); ?>

                        </div>
                        <?php elseif($post->Review=="Negative\n"): ?>
                        <div class="panel-body" style=" background-color: #ffcccb;">
                           Content Review:<br> <?php echo e($post->Review); ?>

                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            </div>
        </div>
        <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
            <h1 class="text-center">Add New Reviews</h1>
        </div>
        <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
            <form action="<?php echo e(route('post.create')); ?>" method="post">
                <div class="form-group">
                    <label for="title" class="control-label">
                        Review Title
                    </label>
                    <input
                            type="text"
                            class="form-control"
                            id="title"
                            name="title">
                </div>
                <div class="form-group">
                    <label for="content" class="control-label">
                        Review Content
                    </label>
                    <textarea
                            name="content"
                            id="content"
                            rows="10"
                            class="form-control"></textarea>
                </div>
                <?php echo e(csrf_field()); ?>

                <button type="submit" class="btn btn-primary">Create Post</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>