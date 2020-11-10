<?php

namespace Modules\Services\Jobs;

use Modules\Models\JobPosting;

class JobPostingService
{

    public function getAllJobPosting()
    {
        $jobPosting = JobPosting::get();

        if (!$jobPosting) {
            throw new \Exception('Error Pulling of Jobs', 404);
        }

        return $jobPosting;
    }

    public function getJobPostingById($jobPostingId)
    {
        $jobPosting = JobPosting::find($jobPostingId);

        if (!$jobPosting) {
            throw new \Exception('Error Pulling of specific job posting', 404);
        }

        return $jobPosting;
    }

    public function createNewJobPosting($requestData)
    {

        $newJobposting = new JobPosting();

        $newJobposting->job_title = $requestData["job_title"];

        $newJobposting->job_description = $requestData["job_description"];

        $newJobposting->salary = $requestData["salary"];

        $newJobposting->save();

        if (!$newJobposting->save()) {
            throw new \Exception('Error Creating new job', 404);
        }

        return $newJobposting;
    }

    public function updateJobPostingById($requestData)
    {

        $updateJobPosting = JobPosting::find($requestData["job_posting_id"]);

        $updateJobPosting->job_title = $requestData["job_title"];

        $updateJobPosting->job_description = $requestData["job_description"];

        $updateJobPosting->salary = $requestData["salary"];

        $updateJobPosting->save();

        if (!$updateJobPosting->save()) {
            throw new \Exception('Error Updating existing job', 404);
        }

        return $updateJobPosting;
    }


    public function deleteJobPostingById($jobPostingId)
    {
        $deleteJobPosting = JobPosting::find($jobPostingId);

        $deleteJobPosting->delete();

        if (!$deleteJobPosting) {
            throw new \Exception('Error Deleting job', 404);
        }

        return $deleteJobPosting;
    }
}
