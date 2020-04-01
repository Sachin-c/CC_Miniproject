<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                <h1 class="text-center">Awesome Posts</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                <form action="<?php echo e(route('post.create')); ?>" method="post">
                    <div class="form-group">
                        <label for="title" class="control-label">
                            Title
                        </label>
                        <input
                                type="text"
                                class="form-control"
                                id="title"
                                name="title">
                    </div>
                    <div class="form-group">
                        <label for="content" class="control-label">
                            Content
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
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>