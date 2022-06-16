<?php

namespace App\Mail\Landlord;

use App\Models\RentTerrain;
use App\Models\Terrain;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RentTerrainRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public RentTerrain $rentTerrain;
    public Terrain $terrain;
    public User $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(RentTerrain $rentTerrain)
    {
        $this->rentTerrain = $rentTerrain;
        $this->user = $rentTerrain->user;
        $this->rentTerrain->startDate = Carbon::parse($this->rentTerrain->startDate)->toDateString();
        $this->rentTerrain->endDate = Carbon::parse($this->rentTerrain->endDate)->toDateString();
        $this->terrain = $rentTerrain->terrain;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.landlord.rent-terrain-request');
    }
}
