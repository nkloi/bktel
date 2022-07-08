<template>

  <div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Teacher id</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="teacher_id" placeholder="">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Subject id</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="subject_id" placeholder="">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Semester</label>
      <select class="form-control" id="exampleFormControlSelect1" name="semester">
        <option>1</option>
        <option>2</option>
        <option>3</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect2">Year</label>
      <select class="form-control" id="exampleFormControlSelect1" name="year">
        <option>2021</option>
        <option>2022</option>
        <option>2023</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Note</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="note"></textarea>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>

</template>

<script>
    export default {
    }
</script>

<style>
</style>