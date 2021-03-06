<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Project extends Model
{

    use RecordsActivity;

     /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return string
     */
    public function path()
    {
    return "/projects/{$this->id}";
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
    return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
    return $this->hasMany(Task::class);
    }

    /**
     * @param $body
     * @return Model
     */
    public function addTask($body)
    {
    return $this->tasks()->create(compact('body'));
    }


    /**
     * @param array $tasks
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function addTasks($tasks)
    {
    return $this->tasks()->createMany($tasks);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activity()
    {
       return $this->hasMany(Activity::class);
    }

    public function invite(User $user)
    {
        return $this->members()->attach($user);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'project_members')->withTimestamps();

    }

}
