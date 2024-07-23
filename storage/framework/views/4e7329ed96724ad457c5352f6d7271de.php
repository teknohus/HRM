<?php echo e(Form::open(['route' => ['employee.import'], 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="col-md-12 mb-6">
            <label for="file" class="form-label">Download sample product CSV file</label>
            <a href="<?php echo e(asset(Storage::url('uploads/sample')) . '/sample-employee2.csv'); ?>"
                class="btn btn-sm btn-primary ">
                <i class="ti ti-download"></i> <?php echo e(__('Download')); ?>

            </a>
        </div>

        <div class="choose-files mt-3">
            <label for="file">
                <div class=" bg-primary "> <i class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                </div>
                <input type="file" class="form-control file" name="file" id="file" data-filename="file">
                <p><span style="color: black" id="fileName"></span></p>
            </label>
        </div>

        <div class="modal-footer">
            <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
            <input type="submit" value="<?php echo e(__('Upload')); ?>" class="btn btn-primary">
        </div>


    </div>
</div>
<?php echo e(Form::close()); ?>


<script>
    // Get file input element
    let fileInput = document.getElementById('file');
    let span = document.getElementById('fileName');
    // Fires on file upload
    fileInput.addEventListener('change', function(event) {

        // Get file name
        let fileName = fileInput.files[0].name;

        // Update file name in span
        span.innerText = fileName;
    });
</script>
<?php /**PATH /home/teknohus/hrm/resources/views/employee/import.blade.php ENDPATH**/ ?>