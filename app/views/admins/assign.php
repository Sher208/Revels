<?php require APPROOT.'/views/inc/headerAdmin.php'; ?>
<div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light">
                <h2 class="text-center">Update Form</h2>
                

                <form action="<?php echo URLROOT;?>admins/assignid/<?php echo data['id']; ?>" method="post">
                    <div class="form-group">
                    <label for="category">Select Your Category:</label>
                    <select name="category" class = "form-control form-control-lg <?php echo (!empty($data['category_err']))? 'is-invalid' : ''; ?>">
                        <option value="none">None</option>
                        <option value="checker">Checker</option>
                        <option value="category head">Category Head</option>
                        <option value="event head">Event Head</option>
                        <option value="organizer">Organizer</option>
                        <option value="organizerhrd">Organizer(HRD)</option>
                        <option value="volunteer">Volunteer</option>
                    </select>

                    </div>
                    <div class="form-group">
                    <label for="event">Select Your Event:</label>
                    <select name="event" class = "form-control form-control-lg <?php echo (!empty($data['event_err']))? 'is-invalid' : ''; ?>">
                        <option>None</option>
                        <option>Singing</option>
                        <option>Model Making</option>
                        <option>Quiz</option>
                        <option>Racing</option>
                    </select>
                    </div>
                    <input type="submit" value="Update" class ="btn btn-success btn-block">
                </form>    
            </div>
        </div>
    </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>