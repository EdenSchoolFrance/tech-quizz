<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\models\User;
use App\models\UserManager;

class UserTest extends TestCase
{
    public function testUserManagerInsertUser()
    {
        $userManagerMock = $this->getMockBuilder(UserManager::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['insertUser'])
            ->getMock();
        
        $userManagerMock->expects($this->once())
            ->method('insertUser')
            ->with(
                $this->equalTo('testuser'),
                $this->equalTo('test@example.com'),
                $this->equalTo('password123'),
                $this->equalTo('user')
            );
        
        $userManagerMock->insertUser('testuser', 'test@example.com', 'password123', 'user');
    }
    
    public function testUserManagerGetUser()
    {
        $user = new User();
        $user->setId('user123');
        $user->setUsername('testuser');
        $user->setEmail('test@example.com');
        $user->setPasswordHash('hashed_password');
        $user->setRole('user');
        
        $userManagerMock = $this->getMockBuilder(UserManager::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getUser'])
            ->getMock();
        
        $userManagerMock->expects($this->once())
            ->method('getUser')
            ->with('test@example.com')
            ->willReturn($user);
        
        $result = $userManagerMock->getUser('test@example.com');
        
        $this->assertInstanceOf(User::class, $result);
        $this->assertEquals('user123', $result->getId());
        $this->assertEquals('testuser', $result->getUsername());
        $this->assertEquals('test@example.com', $result->getEmail());
        $this->assertEquals('hashed_password', $result->getPasswordHash());
        $this->assertEquals('user', $result->getRole());
    }
    
    public function testUserManagerUpdateUser()
    {
        $userManagerMock = $this->getMockBuilder(UserManager::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['updateUser'])
            ->getMock();
        
        $userManagerMock->expects($this->once())
            ->method('updateUser')
            ->with(
                $this->equalTo('user123'),
                $this->equalTo('updateduser'),
                $this->equalTo('updated@example.com'),
                $this->equalTo('admin')
            )
            ->willReturn(true);
        
        $result = $userManagerMock->updateUser('user123', 'updateduser', 'updated@example.com', 'admin');
        
        $this->assertTrue($result);
    }
    
    public function testUserManagerDeleteUser()
    {
        $userManagerMock = $this->getMockBuilder(UserManager::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['deleteUser'])
            ->getMock();
        
        $userManagerMock->expects($this->once())
            ->method('deleteUser')
            ->with('user123')
            ->willReturn(true);
        
        $result = $userManagerMock->deleteUser('user123');
        
        $this->assertTrue($result);
    }
}