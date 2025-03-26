<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\models\Quiz;
use App\models\QuizManager;

class QuizTest extends TestCase
{
    public function testQuizBasicFunctionality()
    {
        $quiz = new Quiz();
        
        $quiz->setId('test123');
        $this->assertEquals('test123', $quiz->getId());
        
        $quiz->setTitle('Test Quiz');
        $this->assertEquals('Test Quiz', $quiz->getTitle());
        
        $quiz->setDescription('This is a test quiz');
        $this->assertEquals('This is a test quiz', $quiz->getDescription());
        
        $quiz->setCreatedBy('user123');
        $this->assertEquals('user123', $quiz->getCreatedBy());
        
        $createdAt = '2025-03-26 09:25:47';
        $quiz->setCreatedAt($createdAt);
        $this->assertEquals($createdAt, $quiz->getCreatedAt());
    }
    
    /**
     * Test QuizManager create method
     */
    public function testQuizManagerCreate()
    {
        $_SESSION = [
            'user' => [
                'id' => 'user123'
            ]
        ];
        
        $quizManagerMock = $this->getMockBuilder(QuizManager::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['create'])
            ->getMock();
        
        $quizManagerMock->expects($this->once())
            ->method('create')
            ->with(
                $this->equalTo('Test Quiz Title'),
                $this->equalTo('Test Quiz Description'),
                $this->equalTo('user123')
            )
            ->willReturn('quiz123'); 
        
        $result = $quizManagerMock->create('Test Quiz Title', 'Test Quiz Description', 'user123');
        
        $this->assertEquals('quiz123', $result);
    }
    
    /**
     * Test QuizManager delete method
     */
    public function testQuizManagerDelete()
    {
        $quizManagerMock = $this->getMockBuilder(QuizManager::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['delete'])
            ->getMock();
        
        $quizManagerMock->expects($this->once())
            ->method('delete')
            ->with('quiz123')
            ->willReturn(true);
        
        $result = $quizManagerMock->delete('quiz123');
        
        $this->assertTrue($result);
    }
    
    /**
     * Test QuizManager get method
     */
    public function testQuizManagerGet()
    {
        $quiz = new Quiz();
        $quiz->setId('quiz123');
        $quiz->setTitle('Test Quiz');
        $quiz->setDescription('Test Description');
        $quiz->setCreatedBy('user123');
        
        $quizManagerMock = $this->getMockBuilder(QuizManager::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['get'])
            ->getMock();
        
        $quizManagerMock->expects($this->once())
            ->method('get')
            ->with('quiz123')
            ->willReturn($quiz);
        
        $result = $quizManagerMock->get('quiz123');
        
        $this->assertInstanceOf(Quiz::class, $result);
        $this->assertEquals('quiz123', $result->getId());
        $this->assertEquals('Test Quiz', $result->getTitle());
    }
    
    /**
     * Test QuizManager update method
     */
    public function testQuizManagerUpdate()
    {
        $quizManagerMock = $this->getMockBuilder(QuizManager::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['update'])
            ->getMock();
        
        $quizManagerMock->expects($this->once())
            ->method('update')
            ->with(
                $this->equalTo('quiz123'),
                $this->equalTo('Updated Quiz Title'),
                $this->equalTo('Updated Quiz Description')
            )
            ->willReturn(true);
        
        $result = $quizManagerMock->update('quiz123', 'Updated Quiz Title', 'Updated Quiz Description');
        
        $this->assertTrue($result);
    }
    
    /**
     * Test QuizManager getQuizzesByUser method
     */
    public function testQuizManagerGetQuizzesByUser()
    {
        $quiz1 = new Quiz();
        $quiz1->setId('quiz123');
        $quiz1->setTitle('Test Quiz 1');
        
        $quiz2 = new Quiz();
        $quiz2->setId('quiz456');
        $quiz2->setTitle('Test Quiz 2');
        
        $quizzes = [$quiz1, $quiz2];
        
        $quizManagerMock = $this->getMockBuilder(QuizManager::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getQuizzesByUser'])
            ->getMock();
        
        $quizManagerMock->expects($this->once())
            ->method('getQuizzesByUser')
            ->with('user123')
            ->willReturn($quizzes);
        
        $result = $quizManagerMock->getQuizzesByUser('user123');
        
        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertInstanceOf(Quiz::class, $result[0]);
        $this->assertEquals('quiz123', $result[0]->getId());
        $this->assertEquals('quiz456', $result[1]->getId());
    }
}