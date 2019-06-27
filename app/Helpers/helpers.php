<?php 



function getStatus($status){
    $class ='';
    switch ($status) {
        case 'Pending':
            # code...
            $class = 'warning';
            break;
        case 'Completed':
            # code...
            $class = 'success';
            break;
        
        case 'On going':
            # code...
            $class = 'primary';
            break;
        
        
        case 'For QA Testing':
            # code...
            $class = 'info';
            break;
        
        default:
            # code...
            break;
    }

    return $class;
}

function getPriorityClass($priority){
    $class ='';
    
    switch ($priority) {
        case 'High':
            # code...
            $class = 'danger';
            break;
        case 'Medium':
            # code...
            $class = 'warning';
            break;
        
        case 'Low':
            # code...
            $class = 'bg-white';
            break;
        
        default:
            # code...
            break;
    }

    return $class;
}

function getPriorityIcon($priority){
    $icon ='';

    switch ($priority) {
        case 'High':
            # code...
            $icon = '<i class="fas fa-skull-crossbones text-danger"></i>';
            break;
        case 'Medium':
            # code...
            $icon = '<i class="fas fa-exclamation-triangle text-warning "></i> ';
            break;

        case 'Low':
            # code...
            $icon = '<i class="fas fa-bookmark text-muted"></i> ';
            break;

        default:
            # code...
            break;
    }

    return $icon;
}