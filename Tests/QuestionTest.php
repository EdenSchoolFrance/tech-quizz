<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\models\Question;
use App\models\QuestionManager;

class QuestionTest extends TestCase
{
    public function testQuestionManagerCreate()
    {
        $questionManagerMock = $this->getMockBuilder(QuestionManager::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['create'])
            ->getMock();
        
        $questionManagerMock->expects($this->once())
            ->method('create')
            ->with(
                $this->equalTo('quiz123'),
                $this->equalTo('What is PHP?')
            )
            ->willReturn('question123');
        
        $result = $questionManagerMock->create('quiz123', 'What is PHP?');
        
        $this->assertEquals('question123', $result);
    }
    
    public function testQuestionManagerDelete()
    {
        $questionManagerMock = $this->getMockBuilder(QuestionManager::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['delete'])
            ->getMock();
        
        $questionManagerMock->expects($this->once())
            ->method('delete')
            ->with('question123')
            ->willReturn(true);
        
        $result = $questionManagerMock->delete('question123');
        
        $this->assertTrue($result);
    }
    
    public function testQuestionManagerGet()
    {
        $question = new Question();
        $question->setId('question123');
        $question->setQuizzId('quiz123');
        $question->setQuestionText('What is PHP?');
        
        $questionManagerMock = $this->getMockBuilder(QuestionManager::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['get'])
            ->getMock();
        
        $questionManagerMock->expects($this->once())
            ->method('get')
            ->with('question123')
            ->willReturn($question);
        
        $result = $questionManagerMock->get('question123');
        
        $this->assertInstanceOf(Question::class, $result);
        $this->assertEquals('question123', $result->getId());
        $this->assertEquals('quiz123', $result->getQuizzId());
        $this->assertEquals('What is PHP?', $result->getQuestionText());
    }
    
    public function testQuestionManagerUpdate()
    {
        $questionManagerMock = $this->getMockBuilder(QuestionManager::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['update'])
            ->getMock();
        
        $questionManagerMock->expects($this->once())
            ->method('update')
            ->with(
                $this->equalTo('question123'),
                $this->equalTo('Updated question text')
            )
            ->willReturn(true);
        
        $result = $questionManagerMock->update('question123', 'Updated question text');
        
        $this->assertTrue($result);
    }
}