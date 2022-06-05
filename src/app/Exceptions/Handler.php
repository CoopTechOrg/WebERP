<?php

namespace App\Exceptions;

use App\Enum\ProgramLogicType;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Undocumented function
     *
     * @param \Illuminate\Http\Request $request
     * @param Throwable $e
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Throwable $e)
    {
        if ($e instanceof InvaliedVerifyTokenException) {
            return redirect('/pre-register')->with(['status' => '不正なアクセスです']);
        }
        if ($e instanceof ProgramLogicException) {
            if ($e->type instanceof ProgramLogicType) {
                // return redirect('/pre-register')->with(['status' => '不正なアクセスです']);
            }
        }
        return parent::render($request, $e);
    }
}
