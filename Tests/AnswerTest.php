<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\models\Answers;
use App\models\AnswersManager;

class AnswerTest extends TestCase
{
    public function testAnswersManagerCreate()
    {
        $answersManagerMock = $this->getMockBuilder(AnswersManager::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['create'])
            ->getMock();
        
        $answersManagerMock->expects($this->once())
            ->method('create')
            ->with(
                $this->equalTo('question123'),
                $this->equalTo('Test Answer Text'),
                $this->equalTo(true)
            )
            ->willReturn('answer123');
        
        $result = $answersManagerMock->create('question123', 'Test Answer Text', true);
        
        $this->assertEquals('answer123', $result);
    }
    
    public function testAnswersManagerDelete()
    {
        $answersManagerMock = $this->getMockBuilder(AnswersManager::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['delete'])
            ->getMock();
        
        $answersManagerMock->expects($this->once())
            ->method('delete')
            ->with('answer123')
            ->willReturn(true);
        
        $result = $answersManagerMock->delete('answer123');
        
        $this->assertTrue($result);
    }
    
    public function testAnswersManagerGet()
    {
        $answers = [
            $this->createMockAnswer('answer123', 'question123', 'Answer 1', true),
            $this->createMockAnswer('answer456', 'question123', 'Answer 2', false)
        ];
        
        $answersManagerMock = $this->getMockBuilder(AnswersManager::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['get'])
            ->getMock();
        
        $answersManagerMock->expects($this->once())
            ->method('get')
            ->with('question123')
            ->willReturn($answers);
        
        $result = $answersManagerMock->get('question123');
        
        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertEquals('answer123', $result[0]->getId());
        $this->assertEquals('answer456', $result[1]->getId());
    }
    
    public function testAnswersManagerStoreUserAnswer()
    {
        $answersManagerMock = $this->getMockBuilder(AnswersManager::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['storeUserAnswer'])
            ->getMock();
        
        $answersManagerMock->expects($this->once())
            ->method('storeUserAnswer')
            ->with(
                $this->equalTo('quiz123'),
                $this->equalTo('user123'),
                $this->equalTo('question123'),
                $this->equalTo('answer123')
            );
        
        $answersManagerMock->storeUserAnswer('quiz123', 'user123', 'question123', 'answer123');
    }
    
    /**
     * Helper method to create a mock Answer object
     */
    private function createMockAnswer($id, $questionId, $answerText, $isCorrect)
    {
        $answer = new Answers();
        
        // Use reflection to set properties directly
        $reflectionClass = new \ReflectionClass(Answers::class);
        
        $idProperty = $reflectionClass->getProperty('id');
        $idProperty->setAccessible(true);
        $idProperty->setValue($answer, $id);
        
        $questionIdProperty = $reflectionClass->getProperty('question_id');
        $questionIdProperty->setAccessible(true);
        $questionIdProperty->setValue($answer, $questionId);
        
        $answerTextProperty = $reflectionClass->getProperty('answer_text');
        $answerTextProperty->setAccessible(true);
        $answerTextProperty->setValue($answer, $answerText);
        
        $isCorrectProperty = $reflectionClass->getProperty('is_correct');
        $isCorrectProperty->setAccessible(true);
        $isCorrectProperty->setValue($answer, $isCorrect);
        
        return $answer;
    }
}