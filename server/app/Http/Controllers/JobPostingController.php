<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Modules\Services\Jobs\JobPostingService;


use Illuminate\Http\Request;

class JobPostingController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function getAllJobPosting()
    {

        try {
            $jobPosting = (new JobPostingService)->getAllJobPosting();
        } catch (\Exception $e) {

            return json_encode(
                [
                    'error'     => true,
                    'message'   => $e->getMessage(),
                    'code'      => $e->getCode()
                ],
                422
            );
        }

        // Respond with 200 status code
        return json_encode($jobPosting, 200);
    }

    public function createNewJobPosting(Request $request)
    {

        try {

            $newJobPosting = (new JobPostingService)->createNewJobPosting($request);
        } catch (\Exception $e) {

            return json_encode(
                [
                    'error'     => true,
                    'message'   => $e->getMessage(),
                    'code'      => $e->getCode()
                ],
                422,
            );
        }
        // Respond with 200 status code
        return json_encode($newJobPosting, 200);
    }

    public function getJobPostingById($jobPostingId)
    {

        try {

            $getJobPostingById = (new JobPostingService)->getJobPostingById($jobPostingId);
        } catch (\Exception $e) {

            return json_encode(
                [
                    'error'     => true,
                    'message'   => $e->getMessage(),
                    'code'      => $e->getCode()
                ],
                422,
            );
        }
        // Respond with 200 status code
        return json_encode($getJobPostingById, 200);
    }

    public function updateJobPostingById(Request $request)
    {

        try {

            $newJobPosting = (new JobPostingService)->updateJobPostingById($request->all());
        } catch (\Exception $e) {

            return json_encode(
                [
                    'error'     => true,
                    'message'   => $e->getMessage(),
                    'code'      => $e->getCode()
                ],
                422,
            );
        }
        // Respond with 200 status code
        return json_encode($newJobPosting, 200);
    }

    public function deleteJobPostingById(Request $request)
    {

        try {

            $deleteJobPosting = (new JobPostingService)->deleteJobPostingById($request["id"]);
        } catch (\Exception $e) {

            return json_encode(
                [
                    'error'     => true,
                    'message'   => $e->getMessage(),
                    'code'      => $e->getCode()
                ],
                422,
            );
        }
        // Respond with 200 status code
        return json_encode($deleteJobPosting, 200);
    }
}
