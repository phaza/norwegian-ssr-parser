<?php namespace Phaza\SSR;

use DateTime;
use DateTimeZone;
use Phaza\SSR\Feature\Language;
use Phaza\SSR\Feature\NameStatus;
use Phaza\SSR\Feature\NameType;
use Phaza\SSR\Feature\Position;
use Phaza\SSR\Feature\TypeStatus;
use stdClass;

class Feature {
	/* @var integer */
	protected $id;

	/* @var NameStatus */
	protected $name_status;

	/* @var DateTime */
	protected $registration_date;

	/* @var DateTime */
	protected $name_decision_date;

	/* @var string */
	protected $name_governor;

	/* @var DateTime */
	protected $updated_at;

	/* @var Language */
	protected $language;

	/* @var string */
	protected $working_group;

	/* @var string */
	protected $name;

	/* @var string */
	protected $municipality_id;

	/* @var string */
	protected $county_id;

	/* @var integer */
	protected $sub_id;

	/* @var TypeStatus */
	protected $type_status;

	/* @var NameType */
	protected $name_type;

	/* @var string */
	protected $text;

	/* @var Position */
	protected $position;

	public function __construct( stdClass $data ) {

		$tz = new DateTimeZone('Europe/Oslo');

		$this->id                 = $data->properties->enh_ssr_id;
		$this->name_status        = new NameStatus( $data->properties->skr_snskrstat );
		$this->registration_date  = DateTime::createFromFormat( 'Ymd', (string) $data->properties->for_regdato, $tz );
		$this->name_decision_date = DateTime::createFromFormat( 'Ymd', (string) $data->properties->skr_sndato, $tz );
		$this->name_governor      = $data->properties->enh_snmynd;
		$this->updated_at         = DateTime::createFromFormat( 'Ymd', (string) $data->properties->for_sist_endret_dt, $tz );
		$this->language           = new Language( $data->properties->enh_snspraak );
		$this->working_group      = $data->properties->nty_gruppenr;
		$this->name               = $data->properties->enh_snavn;
		$this->municipality_id    = str_pad( $data->properties->enh_komm, 4, '0', STR_PAD_LEFT );
		$this->county_id          = str_pad( $data->properties->kom_fylkesnr, 2, '0', STR_PAD_LEFT );
		$this->sub_id = $data->properties->enh_ssrobj_id;
		$this->type_status = new TypeStatus( $data->properties->enh_sntystat );
		$this->name_type = new NameType( $data->properties->enh_navntype );
		$this->text = $data->properties->kpr_tekst;

		$this->position = new Position($data->geometry);
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return NameStatus
	 */
	public function getNameStatus() {
		return $this->name_status;
	}

	/**
	 * @return DateTime
	 */
	public function getRegistrationDate() {
		return $this->registration_date;
	}

	/**
	 * @return DateTime
	 */
	public function getNameDecisionDate() {
		return $this->name_decision_date;
	}

	/**
	 * @return string
	 */
	public function getNameGovernor() {
		return $this->name_governor;
	}

	/**
	 * @return DateTime
	 */
	public function getUpdatedAt() {
		return $this->updated_at;
	}

	/**
	 * @return Language
	 */
	public function getLanguage() {
		return $this->language;
	}

	/**
	 * @return string
	 */
	public function getWorkingGroup() {
		return $this->working_group;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getMunicipalityId() {
		return $this->municipality_id;
	}

	/**
	 * @return string
	 */
	public function getCountyId() {
		return $this->county_id;
	}

	/**
	 * @return int
	 */
	public function getSubId() {
		return $this->sub_id;
	}

	/**
	 * @return TypeStatus
	 */
	public function getTypeStatus() {
		return $this->type_status;
	}

	/**
	 * @return NameType
	 */
	public function getNameType() {
		return $this->name_type;
	}

	/**
	 * @return string
	 */
	public function getText() {
		return $this->text;
	}

	/**
	 * @return Position
	 */
	public function getPosition() {
		return $this->position;
	}
}
