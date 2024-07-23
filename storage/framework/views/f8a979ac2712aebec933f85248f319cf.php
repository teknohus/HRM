<?php
    $plan = Utility::getChatGPTSettings();
?>

<?php echo e(Form::model($loan, ['route' => ['loan.update', $loan->id], 'method' => 'PUT'])); ?>

<div class="modal-body">

    <?php if($plan->enable_chatgpt == 'on'): ?>
    <div class="card-footer text-end">
        <a href="#" class="btn btn-sm btn-primary" data-size="medium" data-ajax-popup-over="true"
            data-url="<?php echo e(route('generate', ['allowance'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
            title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate Content With AI')); ?>">
            <i class="fas fa-robot"></i><?php echo e(__(' Generate With AI')); ?>

        </a>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('title', __('Title'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::text('title', null, ['class' => 'form-control ', 'required' => 'required','placeholder'=>'Enter Title'])); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('loan_option', __('Loan Options*'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::select('loan_option', $loan_options, null, ['class' => 'form-control select2','required' => 'required'])); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('type', __('Type'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::select('type', $loans, null, ['class' => 'form-control select2 amount_type','required' => 'required'])); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('amount', __('Loan Amount'), ['class' => 'col-form-label amount_label'])); ?>

                <?php echo e(Form::number('amount', null, ['class' => 'form-control ', 'required' => 'required','placeholder'=>'Enter Amount'])); ?>

            </div>
        </div>
        
        <div class="form-group">
            <?php echo e(Form::label('reason', __('Reason'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::textarea('reason', null, ['class' => 'form-control ', 'required' => 'required','rows' => 3])); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary">
</div>

<?php echo e(Form::close()); ?>

<?php /**PATH /home/teknohus/hrm/resources/views/loan/edit.blade.php ENDPATH**/ ?>