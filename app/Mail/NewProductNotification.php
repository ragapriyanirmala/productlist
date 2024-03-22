<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Product;

class NewProductNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $product;
    public $imagePath;

    public function __construct(Product $product, $imagePath)
    {
        $this->product = $product;
        $this->imagePath = $imagePath;
    }

    public function build()
    {
        // return $this->view('emails.new_product_notification')
        //             ->subject('New Product Notification')
        //             ->attach($this->imagePath, [
        //                 'as' => 'product_image.jpg', // Name of the attachment as it will appear to the recipient
        //                 'mime' => 'image/jpeg', // Mime type of the attachment
        //             ]);
        return $this->subject('New Product Added')->view('emails.new_product_notification');

        
    }
}
?>
