function addStyleBySubject($subject)
{
    switch ($subject) {
        case '授業':
            $subject_color = "class";
            break;
        case 'サークル':
            $subject_color = "circle";
            break;
        case 'アルバイト':
            $subject_color = "parttime-job";
            break;
        case '就職活動':
            $subject_color = "job-hunting";
            break;
        case 'その他':
            $subject_color = "other";
            break;
        default:
            $subject_color = "default";
            break;
    }
    return $subject_color;
}
