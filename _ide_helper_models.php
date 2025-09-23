<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property string $id
 * @property string $user_id
 * @property string $organization_id
 * @property string $date_activity
 * @property string $name_activity
 * @property string $location
 * @property string $description
 * @property string $accompanying_officer
 * @property string $status_activity
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $is_private
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Historyactivity> $historyactivity
 * @property-read int|null $historyactivity_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Notesactivity> $notesactivity
 * @property-read int|null $notesactivity_count
 * @property-read \App\Models\Organization|null $organization
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereAccompanyingOfficer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDateActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereIsPrivate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereNameActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereStatusActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperActivity {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nama
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCategory {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $user_id
 * @property string $organization_id
 * @property string $location_id
 * @property string $title
 * @property string|null $description
 * @property string $date_confrence
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Location|null $location
 * @property-read \App\Models\Organization|null $organization
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Confrence newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Confrence newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Confrence query()
 * @method static \Illuminate\Database\Eloquent\Builder|Confrence whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Confrence whereDateConfrence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Confrence whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Confrence whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Confrence whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Confrence whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Confrence whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Confrence whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Confrence whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Confrence whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperConfrence {}
}

namespace App\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder|Dashboard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dashboard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dashboard query()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperDashboard {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $notesactivity_id
 * @property string $user_id
 * @property string $picture
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Notesactivity|null $notesactivity
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereNotesactivityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Documentation whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperDocumentation {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $activity_id
 * @property string $log
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Activity|null $activity
 * @method static \Illuminate\Database\Eloquent\Builder|Historyactivity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Historyactivity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Historyactivity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Historyactivity whereActivityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Historyactivity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Historyactivity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Historyactivity whereLog($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Historyactivity whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Historyactivity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperHistoryactivity {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $user_id
 * @property string $organization_id
 * @property string $name
 * @property string $address
 * @property string|null $description
 * @property string|null $longitude
 * @property string|null $latitude
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location query()
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperLocation {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $activity_id
 * @property string $user_id
 * @property string $notes
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Activity|null $activity
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Documentation> $documentation
 * @property-read int|null $documentation_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Notesactivity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notesactivity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notesactivity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notesactivity whereActivityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notesactivity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notesactivity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notesactivity whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notesactivity whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notesactivity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notesactivity whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperNotesactivity {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $name
 * @property string $address
 * @property string $longitude
 * @property string $latitude
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Organization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Organization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Organization query()
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organization whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperOrganization {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property string $module
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereModule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission withoutRole($roles, $guard = null)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPermission {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $confrence_id
 * @property string $name
 * @property string $organization
 * @property string $position
 * @property string $id_employee
 * @property string $gender
 * @property string $nohp
 * @property string $signature
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Confrence|null $confrence
 * @method static \Illuminate\Database\Eloquent\Builder|Presence newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Presence newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Presence query()
 * @method static \Illuminate\Database\Eloquent\Builder|Presence whereConfrenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Presence whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Presence whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Presence whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Presence whereIdEmployee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Presence whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Presence whereNohp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Presence whereOrganization($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Presence wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Presence whereSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Presence whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Presence whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPresence {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string|null $image
 * @property int $size
 * @property int $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperProduct {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $user_id
 * @property string $organization_id
 * @property string $nip
 * @property string $jabatan
 * @property string $nohp
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Organization|null $organization
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Profil newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profil newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profil query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profil whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profil whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profil whereJabatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profil whereNip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profil whereNohp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profil whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profil whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profil whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperProfil {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role withoutPermission($permissions)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperRole {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $role
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Organization|null $organization
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \App\Models\Profil|null $profil
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUser {}
}

