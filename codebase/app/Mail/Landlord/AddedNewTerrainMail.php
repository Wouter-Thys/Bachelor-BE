<?php

namespace App\Mail\Landlord;

use App\Models\Terrain;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AddedNewTerrainMail extends Mailable
{
    use Queueable, SerializesModels;

    public Terrain $terrain;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Terrain $terrain)
    {
        $this->terrain = $terrain;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.landlord.added-new-terrain');
    }
}
