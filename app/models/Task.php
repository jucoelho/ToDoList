use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
user mordels\User;

class Task extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'taks';
	
	protected $fillable = ['title', 'description','status','initialDate','endDate'];

	public static $rules = array(
        'title' => 'required|alpha|min:2',
        'description' => 'required|email|unique:users',
        'status' => 'required|alpha|',
        'initialDate'=>'required',
        'endDate'=>'required'
    );
	
	public function user()
	{
		return $this->belongsTo('Model\User');
	}


}
