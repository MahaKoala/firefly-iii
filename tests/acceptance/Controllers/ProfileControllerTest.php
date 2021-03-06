<?php
/**
 * ProfileControllerTest.php
 * Copyright (C) 2016 thegrumpydictator@gmail.com
 *
 * This software may be modified and distributed under the terms of the
 * Creative Commons Attribution-ShareAlike 4.0 International License.
 *
 * See the LICENSE file for details.
 */
use FireflyIII\Repositories\User\UserRepositoryInterface;


/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-12-10 at 05:51:42.
 */
class ProfileControllerTest extends TestCase
{


    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * @covers \FireflyIII\Http\Controllers\ProfileController::changePassword
     */
    public function testChangePassword()
    {
        $this->be($this->user());
        $this->call('get', route('profile.change-password'));
        $this->assertResponseStatus(200);
        $this->see('<ol class="breadcrumb">');
    }

    /**
     * @covers \FireflyIII\Http\Controllers\ProfileController::deleteAccount
     */
    public function testDeleteAccount()
    {
        $this->be($this->user());
        $this->call('get', route('profile.delete-account'));
        $this->assertResponseStatus(200);
        $this->see('<ol class="breadcrumb">');
    }

    /**
     * @covers \FireflyIII\Http\Controllers\ProfileController::index
     */
    public function testIndex()
    {
        $this->be($this->user());
        $this->call('get', route('profile.index'));
        $this->assertResponseStatus(200);
        $this->see('<ol class="breadcrumb">');
    }

    /**
     * @covers \FireflyIII\Http\Controllers\ProfileController::postChangePassword
     */
    public function testPostChangePassword()
    {
        $repository = $this->mock(UserRepositoryInterface::class);
        $repository->shouldReceive('changePassword');

        $data = [
            'current_password'          => 'james',
            'new_password'              => 'james2',
            'new_password_confirmation' => 'james2',
        ];
        $this->be($this->user());
        $this->call('post', route('profile.change-password.post'), $data);
        $this->assertResponseStatus(302);
        $this->assertSessionHas('success');
    }

    /**
     * @covers \FireflyIII\Http\Controllers\ProfileController::postDeleteAccount
     */
    public function testPostDeleteAccount()
    {
        $repository = $this->mock(UserRepositoryInterface::class);
        $repository->shouldReceive('destroy');
        $data = [
            'password' => 'james',
        ];
        $this->be($this->user());
        $this->call('post', route('profile.delete-account.post'), $data);
        $this->assertResponseStatus(302);
        $this->assertRedirectedToRoute('index');
    }
}
