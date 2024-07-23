<?php
    $plan = Utility::getChatGPTSettings();
?>

<?php echo e(Form::open(['url' => 'loan', 'method' => 'post'])); ?>

<?php echo e(Form::hidden('employee_id', $employee->id, [])); ?>

<div class="modal-body">

    <?php if($plan->enable_chatgpt == 'on'): ?>
    <div class="card-footer text-end">
        <a href="#" class="btn btn-sm btn-primary" data-size="medium" data-ajax-popup-over="true"
            data-url="<?php echo e(route('generate', ['loan'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
            title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate Content With AI')); ?>">
            <i class="fas fa-robot"></i><?php echo e(__(' Generate With AI')); ?>

        </a>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="form-group col-md-6">
            <?php echo e(Form::label('title', __('Title'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::text('title', null, ['class' => 'form-control ', 'required' => 'required', 'placeholder' => 'Enter Title'])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('loan_option', __('Loan Options*'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::select('loan_option', $loan_options, null, ['class' => 'form-control select2', 'required' => 'required'])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('type', __('Type'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::select('type', $loan, null, ['class' => 'form-control select2 amount_type', 'required' => 'required'])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('amount', __('Loan Amount'), ['class' => 'col-form-label amount_label'])); ?>

            <?php echo e(Form::number('amount', null, ['class' => 'form-control ', 'required' => 'required', 'step' => '0.01', 'placeholder' => 'Enter Amount'])); ?>

        </div>

        
        <div class="form-group">
            <?php echo e(Form::label('reason', __('Reason'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::textarea('reason', null, ['class' => 'form-control', 'rows' => 3, 'required' => 'required'])); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary">
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/teknohus/hrm/resources/views/loan/create.blade.php ENDPATH**/ ?>