@extends('layouts.app')

@section('content')
<div id="cover" style=" margin: auto;width: 50%;border: 3px solid green; padding: 10px;">
    <h2 style="text-align: center;">Information Page</h2>
    <?php if ($info) { ?>
        <div>Student ID: <?php echo $info->id ?></div>
        <div>Full name: <?php echo $info->first_name . " " . $info->last_name ?></div>
        <div>Student code: <?php echo $info->student_code ?></div>
        <div>Department: <?php echo $info->department ?></div>
        <div>Faculty: <?php echo $info->faculty ?></div>
        <div>Address: <?php echo $info->address ?></div>
        <div>Phone: <?php echo $info->phone ?></div>
        <div>Note: <?php echo $info->note ?></div>
    <?php } ?>
</div>
@endsection