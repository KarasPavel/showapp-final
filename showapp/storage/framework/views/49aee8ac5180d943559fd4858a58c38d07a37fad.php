<?php $__env->startSection('content'); ?>
    <div class="all-events">
        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card event event-grid">
            <header class="card__thumb">
                <?php if(isset($event->eventImage) && !empty($event->eventImage)): ?>
                    <?php if(strpos($event->eventImage, 'https://') !== false): ?>
                        <img src="<?php echo e($event->eventImage); ?>">
                    <?php else: ?>
                        <img src="<?php echo e(asset( stristr($event->eventImage, 'img'))); ?>" alt="">
                    <?php endif; ?>
                <?php endif; ?>
            </header>
            <div class="card__body">
                <a href="event/<?php echo e($event->id); ?>">MOVIE</a>
                <h2 class="card__subtitle"><?php echo e($event->title); ?></h2>
                <p><?php echo html_entity_decode($event->description); ?></p>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php echo e($events->appends(request()->input())->links()); ?>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.pagination').find('.page-link').each(function () {
                var oldLink = $(this).attr('href');
                if(oldLink != undefined){
                    var pageNumber = oldLink.split('search?');
                    var curentUrl = window.location.origin + window.location.pathname;
                    var newLink = curentUrl + '?' + pageNumber[1];
                    $(this).attr('href', newLink);
                }

            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>