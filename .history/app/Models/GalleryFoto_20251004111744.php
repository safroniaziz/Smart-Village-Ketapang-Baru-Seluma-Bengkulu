<?php<?php



namespace App\Models;namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\Model;



class GalleryFoto extends Modelclass GalleryFoto extends Model

{{

    use HasFactory;    use HasFactory;



    protected $table = 'gallery_foto';    protected $table = 'gallery_foto';



    protected $fillable = [    protected $fillable = [

        'judul',        'judul',

        'deskripsi',        'deskripsi',

        'kategori',        'kategori',

        'url_foto',        'url_foto',

        'alt_text',        'alt_text',

        'urutan',        'urutan',

        'status_aktif',        'status_aktif',

        'views',        'views',

        'photographer',        'photographer',

        'tanggal_foto'        'tanggal_foto'

    ];    ];



    protected $casts = [    protected $casts = [

        'status_aktif' => 'boolean',        'status_aktif' => 'boolean',

        'urutan' => 'integer',        'urutan' => 'integer',

        'views' => 'integer',        'views' => 'integer',

        'tanggal_foto' => 'date',        'tanggal_foto' => 'date',

        'created_at' => 'datetime',        'created_at' => 'datetime',

        'updated_at' => 'datetime',        'updated_at' => 'datetime',

    ];    ];



    // Scopes    // Scopes

    public function scopeAktif($query)    public function scopeAktif($query)

    {    {

        return $query->where('status_aktif', true);        return $query->where('status_aktif', true);

    }    }



    public function scopeByKategori($query, $kategori)    public function scopeByKategori($query, $kategori)

    {    {

        return $query->where('kategori', $kategori);        return $query->where('kategori', $kategori);

    }    }



    public function scopeUrutan($query)    public function scopeUrutan($query)

    {    {

        return $query->orderBy('urutan', 'asc')->orderBy('created_at', 'desc');        return $query->orderBy('urutan', 'asc')->orderBy('created_at', 'desc');

    }    }



    public function scopePopular($query)    public function scopePopular($query)

    {    {

        return $query->orderBy('views', 'desc');        return $query->orderBy('views', 'desc');

    }    }



    // Static methods untuk kategori    // Static methods untuk kategori

    public static function getKategoriList()    public static function getKategoriList()

    {    {

        return [        return [

            'pantai' => 'Pantai Ancol Seluma',            'pantai' => 'Pantai Ancol Seluma',

            'makanan_khas' => 'Makanan Khas',            'makanan_khas' => 'Makanan Khas',

            'seni_budaya' => 'Seni & Budaya',            'seni_budaya' => 'Seni & Budaya',

            'kerajinan' => 'Kerajinan Lokal',            'kerajinan' => 'Kerajinan Lokal',

            'festival' => 'Festival & Acara',            'festival' => 'Festival & Acara',

            'pemandangan' => 'Pemandangan Alam',            'pemandangan' => 'Pemandangan Alam',

            'aktivitas' => 'Aktivitas Wisata'            'aktivitas' => 'Aktivitas Wisata'

        ];        ];

    }    }



    public static function getKategoriOptions()    public static function getKategoriOptions()

    {    {

        return collect(self::getKategoriList())->map(function ($label, $value) {        return collect(self::getKategoriList())->map(function ($label, $value) {

            return [            return [

                'value' => $value,                'value' => $value,

                'label' => $label                'label' => $label

            ];            ];

        })->values();        })->values();

    }    }



    // Accessor    // Accessor

    public function getKategoriLabelAttribute()    public function getKategoriLabelAttribute()

    {    {

        $kategoriList = self::getKategoriList();        $kategoriList = self::getKategoriList();

        return $kategoriList[$this->kategori] ?? ucfirst(str_replace('_', ' ', $this->kategori));        return $kategoriList[$this->kategori] ?? ucfirst(str_replace('_', ' ', $this->kategori));

    }    }



    // Mutator    // Mutator

    public function setKategoriAttribute($value)    public function setKategoriAttribute($value)

    {    {

        $this->attributes['kategori'] = strtolower(str_replace(' ', '_', $value));        $this->attributes['kategori'] = strtolower(str_replace(' ', '_', $value));

    }    }



    // Helper methods    // Helper methods

    public function incrementViews()    public function incrementViews()

    {    {

        $this->increment('views');        $this->increment('views');

    }    }

}}

use Illuminate\Database\Eloquent\Model;

class GalleryFoto extends Model
{
    //
}
